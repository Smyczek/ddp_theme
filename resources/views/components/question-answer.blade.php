
<div class="mb-4">
    <h2 class="mb-0" id="qa-heading-{!! esc_attr($id) !!}">
        <button
        class="group relative flex w-full items-center rounded-[8px] bg-gray px-5 py-4 text-left transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none font-medium text-xl mb-3"
        type="button"
        data-te-collapse-init
        {{ ($id != 1) ? 'data-te-collapse-collapsed' : '' }}
        data-te-target="#collapse-{!! esc_attr($id) !!}"
        aria-expanded="{{ ($id == 1) ? 'true' : 'false' }}"
        aria-controls="collapse-{!! esc_attr($id) !!}">
        {!! $question !!}
        <span class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-6 w-6">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </span>
        </button>
    </h2>
    <div
        id="collapse-{!! esc_attr($id) !!}"
        class="!visible {{ ($id != 1) ? 'hidden' : '' }}"
        data-te-collapse-item
        {{ ($id == 1) ? 'data-te-collapse-show' : '' }}
        aria-labelledby="qa-heading-{!! esc_attr($id) !!}"
        data-te-parent="#ddp-accordion">
        <div class="px-5 py-4 prose">
        {!! $answer !!}
        </div>
    </div>
</div>