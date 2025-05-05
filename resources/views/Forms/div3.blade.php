<div class="flex items-center flex-wrap justify-between gap20 mb-27" id="div-3" style="display: none">
    <h3> Autenticação</h3>
    <fieldset class="name">
        <div class="body-title">email <span class="tf-color-1">*</span></div>
        <input class="flex-grow" type="email" placeholder="example@email.com" name="email" tabindex="0" value=""
            aria-required="true" required>
        <span class="error"></span>
    </fieldset>
    <fieldset class="name">
        <div class="body-title">Senha <span class="tf-color-1">*</span></div>
        <input class="flex-grow" type="password" placeholder="Escreva a senha" name="password" tabindex="0"
            value="" aria-required="true" required>
        <span class="error"></span>
    </fieldset>
    <fieldset class="name">
        <div class="body-title">Confirmar Senha <span class="tf-color-1">*</span></div>
        <input class="flex-grow" type="password" placeholder="Reescreva a senha" name="password_confirmation"
            tabindex="0" value="" aria-required="true" required>
        <span class="error"></span>
    </fieldset>



    <div class="bot">
        <button class="tf-button-back w208" type="button" id="btn-v-1"
            onclick="voltar('div-3','div-2')">Voltar</button>
    </div>
    <div class="bot">

       <button class="tf-button w208" type="button" onclick="submeter('form-principal')">Submeter</button>
    </div>

</div>
