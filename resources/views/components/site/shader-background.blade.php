{{--
    Ambient WebGL background. Sits behind every layer, never intercepts pointer
    events, and is booted by resources/js/shader.js — which finds the canvas by
    this id, so keep them in sync.
--}}
<div class="fixed inset-0 z-[-1] pointer-events-none opacity-30" aria-hidden="true">
    <div class="absolute inset-0 w-full h-full" style="display: block">
        <canvas
            id="shader-canvas-ANIMATION_6"
            style="display: block; width: 100%; height: 100%"
        ></canvas>
    </div>
</div>
