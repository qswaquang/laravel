 @php
    $i = 0;
@endphp
<form id="formSimple" class="py-4 px-5 {{ $attributes['class'] }}" method="post" action="{{ $attributes['action'] }}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        @if (isset($attributes['editmode']) ? $attributes['editmode'] : false)
          @method('PUT')
        @endif
        @foreach ($inputs as $input)
            @switch($input['type'])
                @case('text')
                    <x-form.control>
                        <x-form.label for="{{ isset($input['name']) ? $input['name'] : '' }}" >{{ $input['label'] }}</x-form.label>
                        <x-form.input 
                          id="{{ isset($input['id']) ? $input['id'] : '' }}" 
                          type="{{ $input['type'] }}" 
                          value="{{ isset($input['value']) ? $input['value'] : '' }}" 
                          placeholder="{{ isset($input['placeholder']) ? $input['placeholder'] : '' }}" name="{{ isset($input['name']) ? $input['name'] : '' }}"/>
                      </x-form.control>
                    @break
                @case('select')
                    <x-form.control>
                      <x-form.label for="{{ isset($input['name']) ? $input['name'] : '' }}" >{{ $input['label'] }}</x-form.label>
                      <x-form.select
                        class="{{ isset($input['class']) ? $input['class'] : '' }}" 
                        name="{{ isset($input['name']) ? $input['name'] : '' }}">

                        @foreach ($input['options'] as $option)
                            <option value="{{isset($option['value']) ?? $option['value']}}">{{$option['text']}}</option>
                        @endforeach
                      </x-form.select>
                    </x-form.control>
                    
                    @break

                @case('select-multiple')
                    <x-form.control>
                      <x-form.label for="{{ isset($input['name']) ? $input['name'] : '' }}" >{{ $input['label'] }}</x-form.label>

                      <select 
                        id="{{ isset($input['id']) ? $input['id'] : '' }}" 
                        class=" {{ isset($input['class']) ? $input['class'] : '' }}" 
                        style="width: 100%" 
                        name="{{ isset($input['name']) ? $input['name'] : '' }}" 
                        multiple="multiple">

                          @foreach ($input['options'] as $option)
                            <option 
                                @php
                                if (isset($attributes['editmode']) ? $attributes['editmode'] : false) {
                                    foreach ($input['value'] as $value) {
                                        if ($value == $option['value']) {
                                            echo e('selected ');
                                            break;  
                                        }
                                    }
                                }
                                @endphp
                                value="{{$option['value']}}">{{$option['text']}}</option>
                          @endforeach
                        </select>
                    </x-form.control>
                    
                    @break

                @case('textarea')
                    <x-form.control>
                      <x-form.label 
                        for="{{ isset($input['name']) ? $input['name'] : '' }}" >{{ $input['label'] }}</x-form.label>
                      <x-form.textarea 
                        name="{{ isset($input['name']) ? $input['name'] : '' }}" 
                        placeholder="{{ isset($input['placeholder']) ? $input['placeholder'] : '' }}"
                        >{{ isset($input['value']) ? $input['value'] : '' }}</x-form.textarea>
                    </x-form.control>
                    
                    @break
                @case('upload-image')
                    @php
                        $i++;
                    @endphp
                    <x-form.control>
                      <x-form.label for="{{ isset($input['name']) ? $input['name'] : '' }}" >{{ $input['label'] }}</x-form.label>
                        <div class="border-4 border-blue-500 border-dotted m-auto" style="width: 12rem;height: 12rem;">
                          <img 
                            class="w-full h-full" 
                            id="image{{$i}}" 
                            src="{{ isset($input['value']) && $input['value'] !== "" ? $input['value'] : 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/-Insert_image_here-.svg/320px--Insert_image_here-.svg.png' }}" alt="">
                        </div>
                        <x-form.file accept="image/*" class="flex justify-center my-4" id="fileImageProduct{{$i}}" name="{{ isset($input['name']) ? $input['name'] : '' }}"/>
                      </x-form.control>
                      <script type="text/javascript">
                            $("#fileImageProduct{{$i}}").change(function() {
                              if (!this.files || !this.files[0]) return;
                                const FR = new FileReader();
                                FR.addEventListener("load", function(evt) {
                                  $("#image{{$i}}").attr("src", evt.target.result);
                                  
                                })
                                FR.readAsDataURL(this.files[0]);
                            });
                      </script>
                      
                    @break

                @default
                    <x-form.control>
                        <x-form.label for="{{ isset($input['name']) ? $input['name'] : '' }}" >{{ $input['label'] }}</x-form.label>
                        <x-form.input 
                          id="{{ isset($input['id']) ? $input['id'] : '' }}" 
                          type="text" 
                          value="{{ isset($input['value']) ? $input['value'] : '' }}" 
                          placeholder="{{ isset($input['placeholder']) ? $input['placeholder'] : '' }}" name="{{ isset($input['name']) ? $input['name'] : '' }}"/>
                    </x-form.control>
            @endswitch
        @endforeach

        <div class="flex justify-end w-full">
          <x-form.primary-button>
            @if (isset($attributes['editmode']))
                {{$attributes['editmode'] ? 'Update' : 'Create'}}
            @else
                {{$attributes['buttonText']}}
            @endif
            
          </x-form.primary-button>
        </div>
</form>