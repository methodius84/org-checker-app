<?php

namespace App\Http\Controllers\Organizations;

use App\DTO\OrganizationCheckers\CheckResponseDTO;
use App\Exceptions\InvalidInnException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Organization\CreateRequest;
use App\Http\Requests\Organization\UpdateRequest;
use App\Models\Organization;
use App\Services\OrganizationCheckers\CheckerServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function __construct(private readonly CheckerServiceInterface $service) {}

    public function list()
    {
        $organizations = Organization::all();
        return view('dashboard', compact('organizations'));
    }

    public function create(Request $request)
    {
        return view('organizations.create');
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Organization::query()->create($data);
        return redirect()->route('dashboard');
    }

    public function get(Request $request)
    {

    }

    public function editView(string $uuid)
    {
        try {
            $organization = Organization::query()->where('uuid', $uuid)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return back();
        }
        return view('organizations.edit', compact('organization'));
    }

    public function edit(UpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Organization::query()->find($data['uuid'])->update([
            'name' => $data['name'],
            'inn' => $data['inn'],
            'address' => $data['address'],
        ]);
        return redirect()->route('dashboard');
    }

    public function delete(string $uuid): RedirectResponse
    {
        Organization::query()->find($uuid)->delete();
        return redirect()->route('dashboard');
    }

    public function check(string $uuid): RedirectResponse
    {
        try {
            /** @var Organization $organization */
            $organization = Organization::query()->findOrFail($uuid);
            /** @var CheckResponseDTO $dto */
            $dto = $this->service->check($organization);
            $organization->update([
                'unreliability' => $dto->isNotValid(),
                'unreliability_description' => $dto->getDescription(),
            ]);
            return redirect()->route('dashboard');
        } catch (ModelNotFoundException) {
            return back();
        } catch (InvalidInnException $exception) {
            return back()->withErrors(['check' => $exception->getMessage()]);
        }
    }
}
