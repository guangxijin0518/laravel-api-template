<?php

namespace App\Http\Requests\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone_number' => 'phone:AUTO,US|nullable',
            'latitude' => 'numeric|nullable',
            'longitude' => 'numeric|nullable',
            'address' => 'string|nullable',
            'bio' => 'string|nullable',
            'user_id' => 'unique:user_profiles',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation() 
    {
        $this->merge([ 'user_id' => $this->route('user')->id ]);
    }

    public function bodyParameters()
    {
        return [
            'first_name' => [
                'description' => 'The first name of the user.',
                'example' => 'John'
            ],
            'last_name' => [
                'description' => 'The last name of the user.',
                'example' => 'Doe',
            ],
            'phone_number' => [
                'description' => 'The phone number of the user.',
                'example' => '2242690545'
            ],
            'latitude' => [
                'description' => 'The user location latitude',
                'example' => 40.7127753
            ],
            'longitude' => [
                'description' => 'The user location longitude',
                'example' => -74.0059728
            ],
            'address' => [
                'description' => 'The address of the user',
                'example' => 'New York City, NY'
            ],
            'bio' => [
                'description' => 'The biography of the user',
                'example' => 'biography example'
            ],
        ];
    }
}
