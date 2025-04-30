@extends('Layouts.admin')
@section('admin-content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Nova Solicitação</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index-2.html">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="all-product.html">
                        <div class="text-tiny">Solicitações</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Nova Solicitação</div>
                </li>
            </ul>
        </div>
        <!-- form-add-product -->
        <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
            action="{{ route('solicitacao.store') }}">
            @csrf
            <input type="hidden" name="_token" value="8LNRTO4LPXHvbK2vgRcXqMeLgqtqNGjzWSNru7Xx" autocomplete="off">
            <div class="wg-box">
                <fieldset class="name">
                    <div class="body-title mb-10">Tipo de Solicitação <span class="tf-color-1">*</span>
                    </div>
                    <select class="mb-10" type="text" placeholder="Enter product name" name="name" tabindex="0"
                        value="" aria-required="true" required="">
                        <option value="">Declaração de Notas</option>
                        <option value="">Mudança de Curso</option>
                        <option value="">Reingresso</option>
                    </select>
                    <div class="text-tiny">Do not exceed 100 characters when entering the
                        product name.</div>
                </fieldset>



                <fieldset class="description">
                    <div class="body-title mb-10">Descricao <span class="tf-color-1"></span>
                    </div>
                    <textarea class="mb-10" name="descricao" placeholder="Description" tabindex="0" aria-required="true"></textarea>

                </fieldset>
            </div>
            <div class="wg-box">
                <fieldset>
                    <div class="body-title">Anexar Documentos<span class="tf-color-1">*</span>
                    </div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="../../../localhost_8000/images/upload/upload-1.png" class="effect8" alt="">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Select <span class="tf-color">click
                                        to browse</span></span>
                                <input type="file" id="myFile" name="files">
                            </label>
                        </div>
                    </div>
                </fieldset>

                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit">Solicitar</button>
                </div>
            </div>
        </form>
        <!-- /form-add-product -->
    </div>
    <!-- /main-content-wrap -->
@endsection
