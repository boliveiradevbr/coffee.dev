const S="shader-canvas-ANIMATION_6",x=`attribute vec2 a_position;
varying vec2 v_texCoord;
void main() {
  v_texCoord = a_position * 0.5 + 0.5;
  gl_Position = vec4(a_position, 0.0, 1.0);
}`,w=`precision highp float;
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
}`;function A(t,r,e){const o=t.createShader(r);return t.shaderSource(o,e),t.compileShader(o),t.getShaderParameter(o,t.COMPILE_STATUS)?o:(console.warn("[shader] compilação falhou:",t.getShaderInfoLog(o)),t.deleteShader(o),null)}function L(t){const r=()=>{},e=t.getContext("webgl")||t.getContext("experimental-webgl");if(!e)return r;const o=A(e,e.VERTEX_SHADER,x),s=A(e,e.FRAGMENT_SHADER,w);if(!o||!s)return r;const n=e.createProgram();if(e.attachShader(n,o),e.attachShader(n,s),e.linkProgram(n),!e.getProgramParameter(n,e.LINK_STATUS))return console.warn("[shader] link falhou:",e.getProgramInfoLog(n)),r;e.useProgram(n);const m=e.createBuffer();e.bindBuffer(e.ARRAY_BUFFER,m),e.bufferData(e.ARRAY_BUFFER,new Float32Array([-1,-1,1,-1,-1,1,1,1]),e.STATIC_DRAW);const h=e.getAttribLocation(n,"a_position");e.enableVertexAttribArray(h),e.vertexAttribPointer(h,2,e.FLOAT,!1,0,0);const u=e.getUniformLocation(n,"u_time"),E=()=>{const c=t.clientWidth||1280,_=t.clientHeight||720;(t.width!==c||t.height!==_)&&(t.width=c,t.height=_)},l=c=>{E(),e.viewport(0,0,t.width,t.height),u&&e.uniform1f(u,c*.001),e.drawArrays(e.TRIANGLE_STRIP,0,4)},a=window.matchMedia("(prefers-reduced-motion: reduce)");let i=null;const v=typeof ResizeObserver>"u"?null:new ResizeObserver(()=>{i===null&&l(0)});v?.observe(t);const g=c=>{l(c),i=requestAnimationFrame(g)},f=()=>{i!==null&&(cancelAnimationFrame(i),i=null)},d=()=>{i===null&&!document.hidden&&!a.matches&&(i=requestAnimationFrame(g))},b=()=>document.hidden?f():d(),p=()=>{f(),a.matches?l(0):d()};return document.addEventListener("visibilitychange",b),a.addEventListener("change",p),a.matches?l(0):d(),()=>{f(),v?.disconnect(),document.removeEventListener("visibilitychange",b),a.removeEventListener("change",p),e.deleteBuffer(m),e.deleteShader(o),e.deleteShader(s),e.deleteProgram(n),e.getExtension("WEBGL_lose_context")?.loseContext()}}function R(){const t=document.getElementById(S);if(!(t instanceof HTMLCanvasElement))return;const r=L(t);window.addEventListener("pagehide",r,{once:!0})}const y="(min-width: 1099px)";function C(){const t=document.getElementById("mobile-menu-toggle"),r=document.getElementById("mobile-menu");if(!t||!r)return;const e=t.querySelector("span"),o=n=>{r.classList.toggle("is-open",n),t.setAttribute("aria-expanded",String(n)),t.setAttribute("aria-label",n?"Fechar menu de navegação":"Abrir menu de navegação"),e&&(e.textContent=n?"close":"menu")};t.addEventListener("click",()=>o(!r.classList.contains("is-open"))),r.querySelectorAll(".mobile-menu-link").forEach(n=>{n.addEventListener("click",()=>o(!1))}),window.matchMedia(y).addEventListener("change",n=>{n.matches&&o(!1)})}function I(){const t=document.querySelectorAll(".scroll-reveal:not(.visible)");if(t.length===0)return;if(!("IntersectionObserver"in window)){t.forEach(e=>e.classList.add("visible"));return}const r=new IntersectionObserver(e=>{e.forEach(o=>{o.isIntersecting&&(o.target.classList.add("visible"),r.unobserve(o.target))})},{rootMargin:"0px 0px -100px 0px"});t.forEach(e=>r.observe(e))}R();C();I();
