<div class="flex items-center flex-wrap justify-between gap20 mb-27" id="div-2" style="display: none">
    <h3> Frequencia Academica</h3>
    <fieldset class="name">
        <div class="body-title">Faculdade <span class="tf-color-1">*</span></div>
        <select class="flex-grow" type="text" placeholder="Genero" name="faculdade" tabindex="0" value=""
            aria-required="true" required>
            <option value="" disabled selected>Selecione uma opção</option>
            @foreach ($faculdades as $faculdade)
                <option value="{{ $faculdade->id }}">{{ $faculdade->nome }}</option>
            @endforeach
        </select>
        <span class="error"></span>
    </fieldset>
    <fieldset class="name">
        <div class="body-title">Curso <span class="tf-color-1">*</span></div>
        <select class="flex-grow" type="text" name="curso_id" tabindex="0" value="" aria-required="true"
            required>
            <option value="" disabled selected>Selecione uma opção</option>

            @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
            @endforeach
        </select>
        <span class="error"></span>
    </fieldset>
    <fieldset class="name">
        <div class="body-title">Ano <span class="tf-color-1">*</span></div>
        <select class="flex-grow" type="text" name="provincia_nascimento" tabindex="0" value=""
            aria-required="true" required>
            <option value="" disabled selected>Selecione uma opção</option>
            <option value="1" selected>1º</option>
            <option value="2" selected>2º</option>
            <option value="3" selected>3º</option>
            <option value="4" selected>4º</option>
            {{-- @foreach ($provincias as $provincia)
                <option value="{{ $provincia->id }}">{{ $provincia->label }}</option>
            @endforeach --}}
        </select>
        <span class="error"></span>
    </fieldset>
    <fieldset class="name">
        <div class="body-title">Código de estudante <span class="tf-color-1">*</span></div>
        <input class="flex-grow" type="text" name="matricula" tabindex="0" value=""
            placeholder="00.0000.0000" aria-required="true" required>
        <span class="error"></span>
    </fieldset>


    <div class="bot">
        <button class="tf-button-back w208" type="button" id="btn-v-1"
            onclick="voltar('div-2','div-1')">Voltar</button>
    </div>
    <div class="bot">

        <button class="tf-button w208" type="button" id="btn-2"
            onclick="aoClicar('btn-2','div-2','div-3','form-2')">Próximo</button>
    </div>

</div>
