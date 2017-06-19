<? use models\Users;

return $denied = [
    '' => [Users::ADMIN_ROLE_ID, Users::STORAGE_ROLE_ID],
    'project/' => [Users::ADMIN_ROLE_ID, Users::STORAGE_ROLE_ID],
];