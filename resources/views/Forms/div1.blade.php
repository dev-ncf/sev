<div class="flex items-center flex-wrap justify-between gap20 mb-27" id="div-1">
    <h3> Dados Pessoais</h3>
    <fieldset class="name">
        <div class="body-title">Nome <span class="tf-color-1">*</span></div>
        <input class="flex-grow" type="text" placeholder="Nome sem Apelido" name="nome" tabindex="0" value=""
            aria-required="true" required>
        <div style="display: block "><span class="error"></span></div>
    </fieldset>
    <fieldset class="name">
        <div class="body-title">Apelido <span class="tf-color-1">*</span></div>
        <input class="flex-grow" type="text" placeholder="Apelido sem Nome" name="apelido" tabindex="0"
            value="" aria-required="true" required>
        <span class="error"></span>
    </fieldset>

    <fieldset class="name">
        <div class="body-title">Data de Nascimento <span class="tf-color-1">*</span></div>
        <input class="flex-grow" type="date" placeholder="" name="data_nascimento" tabindex="0" value=""
            aria-required="true" required>
        <span class="error"></span>
    </fieldset>
    <fieldset class="name">
        <div class="body-title">Genero <span class="tf-color-1">*</span></div>
        <select class="flex-grow" type="" placeholder="" name="genero" tabindex="0" value=""
            aria-required="true" required>
            <option value="" disabled selected>Selecione uma opção</option>
            <option value="M">Masculino</option>
            <option value="M">Feminino</option>
        </select>
        <span class="error"></span>
    </fieldset>

    <div class="bot">
        <div></div>
        <button class="tf-button w208" type="button" id="btn-1"
            onclick="aoClicar('btn-1','div-1','div-2','form')">Próximo</button>
    </div>

</div>
