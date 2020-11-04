<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class ServiceController extends Controller
{
    public function index()
    {
        return Inertia::render('Service/Index', [
            'services' => Service::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Service/Create', [
            'availableProtocols' => $this->availableProtocols(),
        ]);
    }

    public function show(Service $service)
    {
        return Inertia::render('Service/Show', [
            'service'            => $service,
            'availableProtocols' => $this->availableProtocols(),
        ]);
    }

    public function store(Request $request)
    {
        $input = Validator::make($request->all(), [
            'name'        => ['required', 'string', 'max:255'],
            'driver'      => ['required', 'in:http'],
            'description' => ['nullable', 'string'],
        ])->validateWithBag('updateService');

        $service = Service::create(array_merge($input, ['options' => []]));

        return back()->with('flash', [
            'service' => $service,
        ]);
    }

    public function update(Service $service, Request $request)
    {
        $input = Validator::make($request->all(), [
            'name'        => ['required', 'string', 'max:255'],
            'driver'      => ['required', 'in:http'],
            'description' => ['nullable', 'string'],
        ])->validateWithBag('updateService');

        $service->fill($input)->save();

        return back();
    }

    public function updateOptions(Service $service, Request $request)
    {
        $input = Validator::make($request->all(), [
            'base_uri' => ['required', 'string', 'url'],
            'timeout'  => ['nullable', 'numeric'],
        ])->validateWithBag('updateService');

        $service->fill(['options' => $input, 'available' => true])->save();

        return back();
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect(route('service.index'));
    }

    private function availableProtocols(): array
    {
        return [
            'http',
        ];
    }
}
