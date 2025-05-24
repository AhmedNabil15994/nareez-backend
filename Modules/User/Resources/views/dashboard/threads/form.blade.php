@inject('users', 'Modules\User\Repositories\Dashboard\UserRepository')


{!! field()->text('message', __('user::dashboard.threads.create.form.message')) !!}


{!! field()->checkBox('select_all', __('user::dashboard.threads.create.form.select_all_users'), 1) !!}


<div class="users-wrapper">

    {!! field()->select('users[]', __('user::dashboard.threads.create.form.users'), $users->getAll()->pluck('name', 'id'),
[], ['multiple' => 'multiple', 'data-name' => 'users']) !!}

</div>




@push('scripts')
<script>
    console.log('fdsf');
    $('#select_all').on('switchChange.bootstrapSwitch', function(event, hidden) {
                 $(`.users-wrapper`).toggle()
    })

</script>
@endpush
