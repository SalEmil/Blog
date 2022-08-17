<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob;
use App\Mail\User\PasswordMail;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use function PHPUnit\Framework\stringEndsWith;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

            StoreUserJob::dispatch($data);
        return redirect()->route('admin.user.index');

    }
}
