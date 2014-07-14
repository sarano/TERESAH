@if (!$activity->existsIn($deletedActivities))
    {{ Lang::get("views/admin/activities/user.created", array("target_name" => e($activity->name), "target_link" => URL::route("admin.users.show", $activity->target_id))) }}
@else
    {{ Lang::get("views/admin/activities/user.created_but_since_deleted", array("target_name" => e($activity->name))) }}
@endif
