@if (!$activity->existsIn($deletedActivities))
    {{ Lang::get("views.admin.activities.datatype.deleted_but_since_restored", array("target_name" => e($activity->name), "target_link" => URL::route("admin.data-types.show", $activity->target_id))) }}
@else
    {{ Lang::get("views.admin.activities.datatype.deleted", array("target_name" => e($activity->name))) }}
@endif
