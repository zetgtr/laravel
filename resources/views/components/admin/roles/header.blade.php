<div class="card-header border-bottom-0">
    <h2 class="card-title">{{count($roles)}} {{__("Entry")}}</h2>
    <div class="page-options ms-auto">
        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal_role" class="btn add_roles btn-primary">{{__("Add role")}}</a>
    </div>
</div>

<x-admin.modal title="{{ __('Add role') }}" id="modal_role" :body="view('components.admin.roles.modal')"/>
