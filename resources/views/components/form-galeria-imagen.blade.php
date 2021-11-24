<div class="card card-outline card-green @error($id) is-invalid @enderror">
    <div class="card-header">
        <h3 class="card-title">
            <label for="{{$id}}">@ucfirst($label)
                @if($required)
                    <small class="required" style="color: red"> *</small>
                @endif
            </label>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="preview-images-zone">
            @if(null !== $modelo->{$id})
                @foreach($modelo->{$id}->where('gallery',true) as $index => $imagen)
                    <div class="preview-image preview-show-{{$index}}">
                        <div class="image-cancel"
                             data-no="{{$index}}">x
                        </div>
                        <div class="image-zone"><img
                                id="pro-img-{{$index}}"
                                src="{{asset('/storage/'.$imagen->url)}}">
                        </div>
                    </div>
                @endforeach
            @else
                <div id="{{$galeryId}}" class="col ">
                    <blockquote class="blockquote text-center">
                        <p class="mb-0">No hay im&aacute;genes a mostrar</p>
                        <footer class="blockquote-footer">
                            {{ __('inifat.extensiones')}}
                        </footer>
                        <footer class="blockquote-footer">
                            {{__('inifat.dimensiones', ['dim' => '640x360'])}}
                        </footer>
                    </blockquote>
                </div>
            @endif
        </div>
        {{-- <input type="hidden" class="form-control @error($id) is-invalid @enderror">--}}
    </div>
    <div class="card-footer center " align="center">
        <input type="file" name="{{$id.'[]'}}" id="{{$id}}"
               multiple="multiple"
               class="form-control d-none " accept="image/*"/>
        <a type="button"
           class="btn btn-sm btn-success text-center mx-auto"
           href="javascript:void(0)"
           onclick="$('#{{$id}}').click()"><i
                class="fas fa-upload"></i> Cargar im&aacute;genes...</a>
    </div>
</div>
{!! $errors->first($id, '<span class="error invalid-feedback" role="alert">:message</span>') !!}
@push('page_scripts')
    <script type="text/javascript">
        /**
         * Read image from source.
         *
         * @param {EventTarget} event
         * @author Ing. Damian Gazmuriz Adan <dgazmuriz@gmail.com>
         */
            //const dt = new DataTransfer();
        let num = 0

        $(document).ready(function () {
            document.querySelector("#{{$id}}").onchange = readImage;
            $(document).on('click', '.image-cancel', function () {
                let no = $(this).data('no');
                $(".preview-image.preview-show-" + no).remove();
                num--;
                if (num == 0)
                    $("#{{$galeryId}}").removeClass("d-none")
            });
        });


        //Cargar Imagen cuando cuando vienen del controlador

        //Cargar Imagen
        function readImage(event) {
            if (window.File && window.FileList && window.FileReader) {
                const files = event.target.files; //FileList object
                const output = $(".preview-images-zone");
                /*let multiple = {{--{!! json_encode($multiple)  !!}--}}*/
                $('#{{$galeryId}}').addClass('d-none');
                for (let i = 0; i < files.length; i++) {
                    if (!files[i].type.match('image')) continue;
                    let picReader = new FileReader();
                    picReader.addEventListener('load', function (event) {
                        output.append('<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-cancel" data-no="' + num + '">x</div>' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + event.target.result + '"></div>' +
                            '</div>');
                        num++;
                    });
                    picReader.readAsDataURL(files[i])
                }
                //document.querySelector("#imagen_galeria").files = dt.files;
            } else {
                $('#{{$galeryId}}').removeClass('d-none');
            }
        }

        function validateImageUnaVez(lastModified) {
            var result = false;
            let files = document.querySelector("#{{$id}}").files;
            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    if (files[i].lastModified == lastModified)
                        result = true
                }
                return result
            }
            console.log(result)
            return result
        }
    </script>
@endpush
