<?php

namespace App\Http\Controllers\Admin;

use App\DTO\{CreateSupportDTO, UpdateSupportDTO};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(protected SupportService $service) {}

    public function index(Request $request)
    {
        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('totalPerPage', 2),
            filter: $request->filter
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('admin/supports/index', compact('supports', 'filters'));
    }

    public function create(Request $request)
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {
        $this->service->new(CreateSupportDTO::makeFromRequest($request));

        return redirect()->route('supports.index');
    }

    public function show(int $id)
    {
        // $support = $support->findOrFail($id);
        if(!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/supports/show', compact('support'));
    }

    public function edit(string $id)
    {
        if(!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/supports/edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, int $id)
    {

        // $support->update($request->only([
        //     'subject',
        //     'body'
        // ]));

        // $support->update($request->validate());

        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));

        if(!$support) {
            return back();
        }

        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {

        // if(!$support = $support->find($id)) {
        //     return back();
        // }

        // $support->delete();

        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
