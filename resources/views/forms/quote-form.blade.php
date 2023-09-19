<div class="block max-w-2xl mx-auto p-6">

@if(!empty($errors))
<x-alert type="warning" class="p-4 rounded prose mb-4">
  <strong class="mb-0 text-white">Please fix the following errors:</strong>
  <ul class="mt-0">
    @foreach ($errors as $error)
        <li>{{ $error }}</li>
    @endforeach
  </ul> 
</x-alert>
@endif
@if(!empty($success))
<x-alert type="success" class="p-4 rounded prose mb-4">
  <strong class="mb-0 text-white">{{ $success }}</strong>
</x-alert>
@endif

  <form id="quote-form" 
    action="{!! admin_url('admin-post.php') !!}" 
    method="post" 
    data-te-validation-init 
    data-te-active-validation="true" 
    autocomplete="off">

    <div class="grid lg:grid-cols-2 gap-4 mb-4">

      <div class="relative" 
        id="first-name-input"
        data-te-input-wrapper-init
        data-te-validate="input"
        data-te-validation-ruleset="isRequired"   
        data-te-class-notch-leading-normal="border-transparent group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-middle-normal="border-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-trailing-normal="border-transparent group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
      >
      <input
          type="text"
          class="peer block min-h-[auto] w-full rounded-lg bg-gray border-transparent px-3 py-[0.32rem] leading-[2.55] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
          id="floatingInputFirstName"
          name="first_name"
          value=""
          placeholder="First Name*" />
        <label
          for="floatingInputFirstName"
          class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] border-transparent origin-[0_0] truncate pt-[0.32rem] leading-[2.55] text-base transition-all duration-200 ease-out peer-focus:-translate-y-[1.3rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.3rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">First Name*</label>
      </div>

      <div class="relative" 
        id="last-name-input"
        data-te-input-wrapper-init
        data-te-validate="input"
        data-te-validation-ruleset="isRequired" 
        data-te-class-notch-leading-normal="border-transparent group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-middle-normal="border-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-trailing-normal="border-transparent group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary">    
        <input
          type="text"
          class="peer block min-h-[auto] w-full rounded-lg bg-gray border-transparent px-3 py-[0.32rem] leading-[2.55] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
          id="floatingInputLastName"
          name="last_name"
          value=""
          placeholder="Last Name*" />
        <label
          for="floatingInputLastName"
          class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] border-transparent origin-[0_0] truncate pt-[0.32rem] leading-[2.55] text-base transition-all duration-200 ease-out peer-focus:-translate-y-[1.3rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.3rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Last Name*</label>
      </div>


      <div class="relative" 
        id="email-input"
        data-te-input-wrapper-init
        data-te-validate="input"
        data-te-validation-ruleset="isRequired" 
        data-te-class-notch-leading-normal="border-transparent group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-middle-normal="border-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-trailing-normal="border-transparent group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary">    
        <input
          type="email"
          class="peer block min-h-[auto] w-full rounded-lg bg-gray border-transparent px-3 py-[0.32rem] leading-[2.55] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
          id="floatingInputEmail"
          name="email"
          value=""
          placeholder="Email*"
          />
        <label
          for="floatingInputEmail"
          class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] border-transparent origin-[0_0] truncate pt-[0.32rem] leading-[2.55] text-base transition-all duration-200 ease-out peer-focus:-translate-y-[1.3rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.3rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Email*</label>
      </div>

      <div class="relative h-fit" 
        id="telephone-input"
        data-te-input-wrapper-init
        data-te-validate="input"
        data-te-class-notch-leading-normal="border-transparent group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-middle-normal="border-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-trailing-normal="border-transparent group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary">    
        <input
          type="text"
          class="peer block min-h-[auto] w-full rounded-lg bg-gray border-transparent px-3 py-[0.32rem] leading-[2.55] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
          id="floatingInputTelephone"
          name="telephone"
          value=""
          placeholder="Telephone"/>
        <label
          for="floatingInputTelephone"
          class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] border-transparent origin-[0_0] truncate pt-[0.32rem] leading-[2.55] text-base transition-all duration-200 ease-out peer-focus:-translate-y-[1.3rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.3rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Telephone</label>
      </div>
    </div>

      <div class="relative mb-4" 
        id="company-input"
        data-te-input-wrapper-init
        data-te-validate="input"
        data-te-validation-ruleset="isRequired" 
        data-te-class-notch-leading-normal="border-transparent group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-middle-normal="border-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-trailing-normal="border-transparent group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary">    
        <input
          type="text"
          class="peer block min-h-[auto] w-full rounded-lg bg-gray border-transparent px-3 py-[0.32rem] leading-[2.55] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
          id="floatingInputCompany"
          name="company"
          value=""
          placeholder="Company*"
          />
        <label
          for="floatingInputCompany"
          class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] border-transparent origin-[0_0] truncate pt-[0.32rem] leading-[2.55] text-base transition-all duration-200 ease-out peer-focus:-translate-y-[1.3rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.3rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Company*</label>
      </div>

      <div class="relative mb-4" 
        id="project-name-input"
        data-te-input-wrapper-init
        data-te-validate="input"
        data-te-validation-ruleset="isRequired" 
        data-te-class-notch-leading-normal="border-transparent group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-middle-normal="border-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-trailing-normal="border-transparent group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary">    
        <input
          type="text"
          class="peer block min-h-[auto] w-full rounded-lg bg-gray border-transparent px-3 py-[0.32rem] leading-[2.55] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
          id="floatingInputProjectName"
          name="project_name"
          value=""
          placeholder="Project Name*"
          />
        <label
          for="floatingInputProjectName"
          class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] border-transparent origin-[0_0] truncate pt-[0.32rem] leading-[2.55] text-base transition-all duration-200 ease-out peer-focus:-translate-y-[1.3rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.3rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Project Name*</label>
      </div>

      <div class="w-full mb-4"
        id="type-of-photography-input"
        data-te-validate="input"
        data-te-validation-ruleset="isRequired"> 
        <select 
          name="type_of_photography"
          data-te-select-init 
          data-te-class-select-input="peer block min-h-[auto] w-full rounded-lg border-0 bg-gray outline-none transition-all duration-200 placeholder:text-text_color ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 cursor-pointer data-[te-input-disabled]:bg-[#e9ecef] data-[te-input-disabled]:cursor-default group-data-[te-was-validated]/validation:mb-4"
          data-te-class-select-input-size-lg="py-[0.32rem] px-3 leading-[2.55]"
          data-te-class-notch-leading-normal="border-transparent group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
          data-te-class-notch-middle-normal="border-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
          data-te-class-notch-trailing-normal="border-transparent group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
          data-te-class-select-label-size-lg="pt-[0.32rem] leading-[2.55] peer-focus:-translate-y-[1.3rem] peer-data-[te-input-state-active]:-translate-y-[1.3rem] data-[te-input-state-active]:-translate-y-[1.3rem]"
          data-te-class-select-arrow-lg="top-[14px] lg:top-[18px]"
          data-te-class-select-option="flex flex-row items-center justify-between w-full px-4 truncate text-gray-700 bg-transparent select-none cursor-pointer data-[te-input-multiple-active]:bg-black/5 hover:[&:not([data-te-select-option-disabled])]:bg-black/5 data-[te-input-state-active]:bg-black/5 data-[te-select-option-selected]:data-[te-input-state-active]:bg-black/5 data-[te-select-selected]:data-[te-select-option-disabled]:cursor-default data-[te-select-selected]:data-[te-select-option-disabled]:text-gray-400 data-[te-select-selected]:data-[te-select-option-disabled]:bg-transparent data-[te-select-option-selected]:bg-black/[0.02] data-[te-select-option-disabled]:text-gray-400 data-[te-select-option-disabled]:cursor-default group-data-[te-select-option-group-ref]/opt:pl-7"
          data-te-class-dropdown="relative outline-none min-w-[100px] m-0 scale-[0.8] opacity-0 bg-white shadow-[0_2px_5px_0_rgba(0,0,0,0.16),_0_2px_10px_0_rgba(0,0,0,0.12)] transition duration-200 motion-reduce:transition-none data-[te-select-open]:scale-100 data-[te-select-open]:opacity-100"
          data-te-select-size="lg"
          >
          <option value="" hidden selected></option>
          @php
            $options = get_option('ddp_quote_select_type_option', array());
            if(!empty($options)){
              foreach ($options as $key => $value) {
                echo '<option value="'. esc_attr($value) .'">'. get_the_title($value) .'</option>';
              }
            }
          @endphp
        </select>
        <label data-te-select-label-ref>Type of photography*</label>
      </div>

      <div class="relative mb-4" 
        id="project-description-input"
        data-te-input-wrapper-init
        data-te-validate="input"
        data-te-validation-ruleset="isRequired"
        data-te-class-notch-leading-normal="border-transparent group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-middle-normal="border-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-trailing-normal="border-transparent group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary">  
        <textarea
          class="peer block min-h-[auto] w-full rounded border-0 bg-gray px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 peer:boder-transparent  peer-data-[te-input-state-active]:border-transparent"
          id="FormControlTextarea"
          name="quote_content"
          value=""
          rows="3"
          placeholder="Your message"></textarea>
        <label
          for="FormControlTextarea"
          class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] transition-all duration-200 ease-out  peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Please Describe Your Project*</label>
      </div>


      <div class="relative mb-4" 
        id="project-timeline"
        data-te-input-wrapper-init
        data-te-class-notch-leading-normal="border-transparent group-data-[te-input-focused]:shadow-[-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-middle-normal="border-transparent group-data-[te-input-focused]:shadow-[0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
        data-te-class-notch-trailing-normal="border-transparent group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary">    
        <input
          type="text"
          class="peer block min-h-[auto] w-full rounded-lg bg-gray border-transparent px-3 py-[0.32rem] leading-[2.55] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
          id="floatingInputProjectTimeline"
          name="project_timeline"
          value=""
          placeholder="Project Timeline"/>
        <label
          for="floatingInputProjectTimeline"
          class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] border-transparent origin-[0_0] truncate pt-[0.32rem] leading-[2.55] text-base transition-all duration-200 ease-out peer-focus:-translate-y-[1.3rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.3rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Project Timeline</label>
      </div>


      <input name="action" value="quote_form" type="hidden">
      @php 
        wp_nonce_field( 'process_quote_form', 'quote_form_nonce' );
      @endphp

      <!--Submit button-->
      <button
        id="validation-btn"
        type="submit"
        class="inline-block w-full rounded-lg bg-primary px-6 pb-2 pt-2.5 text-3xl font-bold uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-secondary focus:bg-primary-600 focus:outline-none focus:ring-0 active:bg-primary-700"
        data-te-submit-btn-ref>
        Let’s talk
      </button>

    </div>
  </form>
</div>