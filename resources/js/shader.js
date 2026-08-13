/**
 * Ambient WebGL background — a domain-warped fBm field in coffee tones.
 *
 * Ported from the prototype's assets/shader.js. The visual output is unchanged;
 * what was added is shader compile/link reporting, a paused loop while the tab
 * is hidden, a single static frame when the visitor asks for reduced motion,
 * and teardown on page unload.
 */

const CANVAS_ID = 'shader-canvas-ANIMATION_6';

const VERTEX_SHADER = `attribute vec2 a_position;
varying vec2 v_texCoord;
void main() {
  v_texCoord = a_position * 0.5 + 0.5;
  gl_Position = vec4(a_position, 0.0, 1.0);
}`;

const FRAGMENT_SHADER = `precision highp float;
varying vec2 v_texCoord;
uniform float u_time;

float noise(vec2 p) {
    return fract(sin(dot(p, vec2(12.9898, 78.233))) * 43758.5453);
}

float smooth_noise(vec2 p) {
    vec2 i = floor(p);
    vec2 f = fract(p);
    f = f * f * (3.0 - 2.0 * f);
    float a = noise(i);
    float b = noise(i + vec2(1.0, 0.0));
    float c = noise(i + vec2(0.0, 1.0));
    float d = noise(i + vec2(1.0, 1.0));
    return mix(mix(a, b, f.x), mix(c, d, f.x), f.y);
}

float fbm(vec2 p) {
    float v = 0.0;
    float a = 0.5;
    vec2 shift = vec2(100.0);
    mat2 rot = mat2(cos(0.5), sin(0.5), -sin(0.5), cos(0.5));
    for (int i = 0; i < 5; ++i) {
        v += a * smooth_noise(p);
        p = rot * p * 2.0 + shift;
        a *= 0.5;
    }
    return v;
}

void main() {
    vec2 uv = v_texCoord;
    vec2 p = uv * 3.0;

    float t = u_time * 0.15;
    vec2 q = vec2(fbm(p + t), fbm(p + vec2(5.2, 1.3) + t));
    vec2 r = vec2(fbm(p + q + vec2(1.7, 9.2) + 0.15 * t), fbm(p + q + vec2(8.3, 2.8) + 0.126 * t));
    float f = fbm(p + r);

    // Coffee/Dark theme colors
    vec3 color_bg = vec3(0.06, 0.04, 0.03); // Very dark coffee
    vec3 color_mid = vec3(0.12, 0.08, 0.06); // Muted brown
    vec3 color_highlight = vec3(0.2, 0.15, 0.1); // Light coffee accent

    vec3 color = mix(color_bg, color_mid, clamp((f*f)*4.0, 0.0, 1.0));
    color = mix(color, color_highlight, clamp(length(q), 0.0, 1.0) * 0.3);

    gl_FragColor = vec4(color * (f * f * f + 0.6 * f * f + 0.5 * f), 1.0);
}`;

/**
 * @param {WebGLRenderingContext} gl
 * @param {number} type
 * @param {string} source
 * @returns {WebGLShader|null}
 */
function compileShader(gl, type, source) {
    const shader = gl.createShader(type);

    gl.shaderSource(shader, source);
    gl.compileShader(shader);

    if (!gl.getShaderParameter(shader, gl.COMPILE_STATUS)) {
        console.warn('[shader] compilação falhou:', gl.getShaderInfoLog(shader));
        gl.deleteShader(shader);

        return null;
    }

    return shader;
}

/**
 * Boots the background shader.
 *
 * @param {HTMLCanvasElement} canvas
 * @returns {() => void} teardown function
 */
function startShader(canvas) {
    const noop = () => {};

    const gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');

    if (!gl) {
        return noop;
    }

    const vertexShader = compileShader(gl, gl.VERTEX_SHADER, VERTEX_SHADER);
    const fragmentShader = compileShader(gl, gl.FRAGMENT_SHADER, FRAGMENT_SHADER);

    if (!vertexShader || !fragmentShader) {
        return noop;
    }

    const program = gl.createProgram();

    gl.attachShader(program, vertexShader);
    gl.attachShader(program, fragmentShader);
    gl.linkProgram(program);

    if (!gl.getProgramParameter(program, gl.LINK_STATUS)) {
        console.warn('[shader] link falhou:', gl.getProgramInfoLog(program));

        return noop;
    }

    gl.useProgram(program);

    // Fullscreen quad.
    const buffer = gl.createBuffer();
    gl.bindBuffer(gl.ARRAY_BUFFER, buffer);
    gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1, -1, 1, -1, -1, 1, 1, 1]), gl.STATIC_DRAW);

    const position = gl.getAttribLocation(program, 'a_position');
    gl.enableVertexAttribArray(position);
    gl.vertexAttribPointer(position, 2, gl.FLOAT, false, 0, 0);

    const timeUniform = gl.getUniformLocation(program, 'u_time');

    /**
     * Keeps the drawing buffer in step with the CSS-driven layout size. Stays in
     * CSS pixels — no devicePixelRatio scaling — because the field is very low
     * frequency and the prototype rendered it the same way.
     */
    const syncSize = () => {
        const width = canvas.clientWidth || 1280;
        const height = canvas.clientHeight || 720;

        if (canvas.width !== width || canvas.height !== height) {
            canvas.width = width;
            canvas.height = height;
        }
    };

    const draw = (elapsed) => {
        syncSize();
        gl.viewport(0, 0, canvas.width, canvas.height);

        if (timeUniform) {
            gl.uniform1f(timeUniform, elapsed * 0.001);
        }

        gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);
    };

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

    let frame = null;

    const resizeObserver =
        typeof ResizeObserver === 'undefined'
            ? null
            : new ResizeObserver(() => {
                  // A resize while the loop is parked still needs a repaint.
                  if (frame === null) {
                      draw(0);
                  }
              });

    resizeObserver?.observe(canvas);

    const render = (elapsed) => {
        draw(elapsed);
        frame = requestAnimationFrame(render);
    };

    const stop = () => {
        if (frame !== null) {
            cancelAnimationFrame(frame);
            frame = null;
        }
    };

    const play = () => {
        if (frame === null && !document.hidden && !reducedMotion.matches) {
            frame = requestAnimationFrame(render);
        }
    };

    const onVisibilityChange = () => (document.hidden ? stop() : play());
    const onMotionPreferenceChange = () => {
        stop();
        reducedMotion.matches ? draw(0) : play();
    };

    document.addEventListener('visibilitychange', onVisibilityChange);
    reducedMotion.addEventListener('change', onMotionPreferenceChange);

    // Reduced motion still gets the texture, just frozen.
    reducedMotion.matches ? draw(0) : play();

    return () => {
        stop();
        resizeObserver?.disconnect();
        document.removeEventListener('visibilitychange', onVisibilityChange);
        reducedMotion.removeEventListener('change', onMotionPreferenceChange);
        gl.deleteBuffer(buffer);
        gl.deleteShader(vertexShader);
        gl.deleteShader(fragmentShader);
        gl.deleteProgram(program);
        gl.getExtension('WEBGL_lose_context')?.loseContext();
    };
}

export function initShaderBackground() {
    const canvas = document.getElementById(CANVAS_ID);

    if (!(canvas instanceof HTMLCanvasElement)) {
        return;
    }

    const teardown = startShader(canvas);

    window.addEventListener('pagehide', teardown, { once: true });
}
