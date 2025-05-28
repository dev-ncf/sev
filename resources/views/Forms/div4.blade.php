<div class="flex items-center flex-wrap justify-between gap20 mb-27" id="div-4" style="display: none">
    <h3> Idendificação</h3>

    <h4 style="color:#ff0000">Os documentos devem ter o nome correspondente. Ex: BI_alberto.pdf,
        NUIT_alberto.pdf</h4>
    <fieldset class="name">
        <div class="body-title">Tipo do Documento <span class="tf-color-1">*</span></div>
        <select class="flex-grow" type="text" placeholder="Numero " name="tipo_documento" tabindex="0" value=""
            aria-required="true">
            <option value="" selected disabled>Selecione uma opcao</option>
            <option value="BI">BI</option>
            <option value="PASSARORT">PASSAPORT</option>
        </select>
        <span class="error"></span>
    </fieldset>
    <fieldset class="name">
        <div class="body-title">Numero do Documento <span class="tf-color-1">*</span></div>
        <input class="flex-grow" type="text" placeholder="Numero de documento" name="numero_documento" tabindex="0"
            value="" aria-required="true">
        <span class="error"></span>
    </fieldset>
    <fieldset class="name">
        <div class="body-title">Local de Emissão <span class="tf-color-1">*</span></div>
        <input class="flex-grow" type="text" placeholder="Local" name="local_emissao" tabindex="0"
            value="" aria-required="true">
        <span class="error"></span>
    </fieldset>
    <fieldset class="name">
        <div class="body-title">Local de Emissão <span class="tf-color-1">*</span></div>
        <input class="flex-grow" type="date" placeholder="Data" name="data_emissao" tabindex="0"
            value="" aria-required="true">
        <span class="error"></span>
    </fieldset>
    <fieldset>
        <div class="body-title">Documento <span class="tf-color-1"></span>
        </div>

        <div class="upload-image flex-grow">
            <div class="item" id="imgpreview" style="display:none">
                <img src="upload-1.html" class="effect8" alt="">
            </div>
            <div id="upload-area" class="item up-load">
                <label class="uploadfile" for="myFile" id="upload-label">
                    <div class="upload-container">
                        <span class="icon">
                            <i class="icon-upload-cloud"></i>
                        </span>
                        <p class="upload-text">Selecione todo documentos necessários para
                            candidatura<strong class="tf-color">clique
                                para
                                navegar</strong></p>
                    </div>
                    <input type="file" id="myFile" name="documento" required>
                    <span class="error"></span>
                </label>

            </div>

            <!-- Área para exibir as imagens carregadas -->
            <div id="preview" class="preview-container" style="display: none;"></div>

            <!-- Botão para adicionar mais imagens -->
            <button id="add-more-btn" type="button" style="display: none;">+</button>

            <!-- Modal para visualizar imagem em tamanho maior -->
            <div id="image-modal" class="modal" style="display: none;">
                <span class="close">&times;</span>
                <img class="modal-content" id="modal-img">
            </div>
        </div>

    </fieldset>

    <div class="bot">
        <div></div>
        <button class="tf-button-back w208" type="button" id="btn-v-1"
            onclick="voltar('div-4','div-3')">Voltar</button>
    </div>

    <div class="bot">
        <div></div>

        <button class="tf-button w208" type="button" onclick="submeter('form-principal')">Submeter</button>
    </div>

</div>
