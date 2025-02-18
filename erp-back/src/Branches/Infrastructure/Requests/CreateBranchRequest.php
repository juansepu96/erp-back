<?php

namespace Src\Branches\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBranchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'number' => 'required|int',
            'floor' => 'nullable|int',
            'door' => 'nullable|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'hours' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede exceder los 255 caracteres.',

            'street.required' => 'El campo calle es obligatorio.',
            'street.string' => 'La calle debe ser una cadena de texto.',
            'street.max' => 'La calle no puede exceder los 255 caracteres.',

            'number.required' => 'El campo numero es obligatorio.',
            'number.int' => 'El numero debe ser un numero.',

            'floor.nullable' => 'El campo piso es opcional.',
            'floor.string' => 'El piso debe ser una cadena de texto.',
            'floor.max' => 'El piso no puede exceder los 255 caracteres.',

            'door.nullable' => 'El campo puerta es opcional.',
            'door.string' => 'La puerta debe ser una cadena de texto.',
            'door.max' => 'La puerta no puede exceder los 255 caracteres.',

            'city_id.required' => 'El campo ciudad es obligatorio.',
            'city_id.exists' => 'La ciudad seleccionada no es válida.',

            'hours.required' => 'El campo horas es obligatorio.',
            'hours.string' => 'Las horas deben ser una cadena de texto.',
            'hours.max' => 'Las horas no pueden exceder los 255 caracteres.',

            'phone.required' => 'El campo teléfono es obligatorio.',
            'phone.string' => 'El teléfono debe ser una cadena de texto.',
            'phone.max' => 'El teléfono no puede exceder los 20 caracteres.',
        ];
    }

}
