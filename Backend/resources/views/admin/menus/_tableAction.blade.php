<div class="list-icons">
    @can('menus.edit')
        <a href="{{ route('admin.menus.edit', $id) }}" class="item-action btn-primary" title="{{ __('Chỉnh sửa') }}"><i
                class="fal fa-pencil-alt"></i></a>
    @endcan
{{--    @can('menus.delete')--}}
{{--        <a href="javascript:void(0)" data-url="{{ route('admin.menus.destroy', $id) }}"--}}
{{--           class="item-action js-delete btn-danger" title="{{ __('Xóa') }}"><i class="fal fa-trash-alt"></i></a>--}}
{{--    @endcan--}}
</div>
