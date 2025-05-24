<?php

namespace Modules\Service\Http\Controllers\Frontend;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Service\Entities\ServiceApply;
use Illuminate\Support\Facades\Notification;
use Modules\Service\Notifications\ServiceApplyNotification;
use Modules\Service\Http\Requests\Frontend\ServiceApplyRequest;
use Modules\Service\Repositories\Frontend\ServiceRepository as Service;

class ServiceController extends Controller
{
    public function __construct(Service $service)
    {
        $this->service    = $service;
    }

    public function index()
    {
        $services = $this->service->getAllActive();

        return view('service::frontend.index', compact('services'));
    }

    public function show($slug)
    {
        $service = $this->service->findBySlug($slug);

        if (!$service) {
            abort(404);
        }

        return view('service::frontend.show', compact('service'));
    }


    public function serviceApply()
    {
        $services = $this->service->getAllActive();

        return view('service::frontend.service-apply', compact('services'));
    }


    public function sendServiceApply(ServiceApplyRequest $request)
    {
        $validated=$request->validated();
        $file=Arr::pull($validated, 'file');
        $serviceApply= ServiceApply::create($validated);
        $serviceApply->addMedia($file)->toMediaCollection('file');

        Notification::route('mail', setting('contact_us', 'email'))
       ->notify((new ServiceApplyNotification($serviceApply))->locale(locale()));


        return Response()->json([true , __('You\'r  request sent and we will check it soon')]);
    }
}
