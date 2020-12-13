<option value="" disabled="disabled" selected="selected"></option>
<option value="AC" {{ collect(old('state'))->contains('AC') ? 'selected' : '' }}>AC</option>
<option value="AL" {{ collect(old('state'))->contains('AL') ? 'selected' : '' }}>AL</option>
<option value="AP" {{ collect(old('state'))->contains('AP') ? 'selected' : '' }}>AP</option>
<option value="AM" {{ collect(old('state'))->contains('AM') ? 'selected' : '' }}>AM</option>
<option value="BA" {{ collect(old('state'))->contains('BA') ? 'selected' : '' }}>BA</option>
<option value="CE" {{ collect(old('state'))->contains('CE') ? 'selected' : '' }}>CE</option>
<option value="ES" {{ collect(old('state'))->contains('ES') ? 'selected' : '' }}>ES</option>
<option value="GO" {{ collect(old('state'))->contains('GO') ? 'selected' : '' }}>GO</option>
<option value="MA" {{ collect(old('state'))->contains('MA') ? 'selected' : '' }}>MA</option>
<option value="MT" {{ collect(old('state'))->contains('MT') ? 'selected' : '' }}>MT</option>
<option value="MS" {{ (collect(old('state'))->contains('MS') || old('state') == '' ) ? 'selected' : '' }}>MS</option>
<option value="MG" {{ collect(old('state'))->contains('MG') ? 'selected' : '' }}>MG</option>
<option value="PA" {{ collect(old('state'))->contains('PA') ? 'selected' : '' }}>PA</option>
<option value="PB" {{ collect(old('state'))->contains('PB') ? 'selected' : '' }}>PB</option>
<option value="PR" {{ collect(old('state'))->contains('PR') ? 'selected' : '' }}>PR</option>
<option value="PE" {{ collect(old('state'))->contains('PE') ? 'selected' : '' }}>PE</option>
<option value="PI" {{ collect(old('state'))->contains('PI') ? 'selected' : '' }}>PI</option>
<option value="RJ" {{ collect(old('state'))->contains('RJ') ? 'selected' : '' }}>RJ</option>
<option value="RN" {{ collect(old('state'))->contains('RN') ? 'selected' : '' }}>RN</option>
<option value="RS" {{ collect(old('state'))->contains('RS') ? 'selected' : '' }}>RS</option>
<option value="RO" {{ collect(old('state'))->contains('RO') ? 'selected' : '' }}>RO</option>
<option value="RR" {{ collect(old('state'))->contains('RR') ? 'selected' : '' }}>RR</option>
<option value="SC" {{ collect(old('state'))->contains('SC') ? 'selected' : '' }}>SC</option>
<option value="SP" {{ collect(old('state'))->contains('SP') ? 'selected' : '' }}>SP</option>
<option value="SE" {{ collect(old('state'))->contains('SE') ? 'selected' : '' }}>SE</option>
<option value="TO" {{ collect(old('state'))->contains('TO') ? 'selected' : '' }}>TO</option>
<option value="DF" {{ collect(old('state'))->contains('DF') ? 'selected' : '' }}>DF</option>
