<?php

use App\Entities\Company;
use App\Entities\Group;
use App\Entities\MpesaIncoming;
use App\Entities\MpesaPaybill;
use App\Permission;
use App\Role;
use App\Entities\SmsOutbox;
use App\User;

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});


/******** SMS OUTBOX ROUTES ********/

// Home > SMS outbox
Breadcrumbs::register('smsoutbox', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Sms Outbox', route('smsoutbox.index'));
});

// Home > SMS outbox > Create New SMS
Breadcrumbs::register('smsoutbox.create', function($breadcrumbs)
{
    $breadcrumbs->parent('smsoutbox');
    $breadcrumbs->push('Create New SMS', route('smsoutbox.create'));
});

// Home > SMS outbox > Show SMS
Breadcrumbs::register('smsoutbox.show', function($breadcrumbs, $id)
{
    $smsoutbox = SmsOutbox::findOrFail($id);
    $breadcrumbs->parent('smsoutbox');
    $breadcrumbs->push($smsoutbox->id, route('smsoutbox.show', $smsoutbox->id));
});

/******** SMS OUTBOX ROUTES ********/


/******** GROUPS ROUTES ********/

// Home > Groups
Breadcrumbs::register('groups', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Groups', route('groups.index'));
});

// Home > Groups > Create New Group
Breadcrumbs::register('groups.create', function($breadcrumbs)
{
    $breadcrumbs->parent('groups');
    $breadcrumbs->push('Create New Group', route('groups.create'));
});

// Home > Groups > Show Group
Breadcrumbs::register('groups.show', function($breadcrumbs, $id)
{
    $group = Group::findOrFail($id);
    $breadcrumbs->parent('groups');
    $breadcrumbs->push($group->name, route('groups.show', $group->id));
});

// Home > Groups > Edit Group
Breadcrumbs::register('groups.edit', function($breadcrumbs, $id)
{
    $group = Group::findOrFail($id);
    $breadcrumbs->parent('groups');
    $breadcrumbs->push("Edit group - " . $group->name, route('groups.edit', $group->id));
});

/******** END GROUPS ROUTES ********/


/******** COMPANIES ROUTES ********/

// Home > Companies
Breadcrumbs::register('companies', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Companies', route('companies.index'));
});

// Home > Companies > Create New Company
Breadcrumbs::register('companies.create', function($breadcrumbs)
{
    $breadcrumbs->parent('companies');
    $breadcrumbs->push('Create New Company', route('companies.create'));
});

// Home > Companies > Show Company
Breadcrumbs::register('companies.show', function($breadcrumbs, $id)
{
    $company = Company::findOrFail($id);
    $breadcrumbs->parent('companies');
    $breadcrumbs->push($company->name, route('companies.show', $company->id));
});

// Home > Companies > Edit Company
Breadcrumbs::register('companies.edit', function($breadcrumbs, $id)
{
    $company = Company::findOrFail($id);
    $breadcrumbs->parent('companies');
    $breadcrumbs->push("Edit company - " . $company->name, route('companies.edit', $company->id));
});

/******** END COMPANIES ROUTES ********/



/******** MPESA PAYBILLS ROUTES ********/

// Home > Mpesa Paybills
Breadcrumbs::register('mpesa-paybills', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Mpesa Paybills', route('mpesa-paybills.index'));
});

// Home > Mpesa Paybills > Create Mpesa Paybill
Breadcrumbs::register('mpesa-paybills.create', function($breadcrumbs)
{
    $breadcrumbs->parent('mpesa-paybills');
    $breadcrumbs->push('Create Mpesa Paybill', route('mpesa-paybills.create'));
});

// Home > Mpesa Paybills > Show Mpesa Paybill
Breadcrumbs::register('mpesa-paybills.show', function($breadcrumbs, $id)
{
    $mpesapaybill = MpesaPaybill::findOrFail($id);
    $breadcrumbs->parent('mpesa-paybills');
    $breadcrumbs->push("Showing Paybill - " . $mpesapaybill->paybill_number, route('mpesa-paybills.show', $mpesapaybill->id));
});

// Home > Mpesa Paybills > Edit Mpesa Paybill
Breadcrumbs::register('mpesa-paybills.edit', function($breadcrumbs, $id)
{
    $mpesapaybill = MpesaPaybill::findOrFail($id);
    $breadcrumbs->parent('mpesa-paybills');
    $breadcrumbs->push("Edit Mpesa Paybill - " . $mpesapaybill->paybill_number, route('mpesa-paybills.edit', $mpesapaybill->id));
});

/******** END MPESA PAYBILLS ROUTES ********/




/******** MPESA INCOMING ROUTES ********/

// Home > Mpesa Incoming
Breadcrumbs::register('mpesa-incoming', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Mpesa Incoming', route('mpesa-incoming.index'));
});

// Home > Mpesa Incoming > Create Mpesa Incoming
Breadcrumbs::register('mpesa-incoming.create', function($breadcrumbs)
{
    $breadcrumbs->parent('mpesa-incoming');
    $breadcrumbs->push('Create Mpesa Incoming', route('mpesa-incoming.create'));
});

// Home > Mpesa incoming > Show Mpesa Incoming
Breadcrumbs::register('mpesa-incoming.show', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('mpesa-incoming');
    $breadcrumbs->push("Showing Mpesa Incoming - " . $id, route('mpesa-incoming.show', $id));
});

// Home > Mpesa incoming > Edit Mpesa Incoming
Breadcrumbs::register('mpesa-incoming.edit', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('mpesa-incoming');
    $breadcrumbs->push("Edit Mpesa Incoming - " . $id, route('mpesa-incoming.edit', $id));
});

/******** END MPESA INCOMING ROUTES ********/



/******** USSD REGISTRATION ROUTES ********/

// Home > USSD Registration
Breadcrumbs::register('ussd-registration', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('USSD Registration', route('ussd-registration.index'));
});

// Home > USSD Registration > Create USSD Registration
Breadcrumbs::register('ussd-registration.create', function($breadcrumbs)
{
    $breadcrumbs->parent('ussd-registration');
    $breadcrumbs->push('Create USSD Registration', route('ussd-registration.create'));
});

// Home > USSD Registration > Show USSD Registration
Breadcrumbs::register('ussd-registration.show', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('ussd-registration');
    $breadcrumbs->push("Showing USSD Registration - " . $id, route('ussd-registration.show', $id));
});

// Home > USSD Registration > Edit USSD Registration
Breadcrumbs::register('ussd-registration.edit', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('ussd-registration');
    $breadcrumbs->push("Edit USSD Registration - " . $id, route('ussd-registration.edit', $id));
});

/******** END USSD REGISTRATION ROUTES ********/




/******** PERMISSIONS ROUTES ********/

// Home > Permissions
Breadcrumbs::register('permissions', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Permissions', route('permissions.index'));
});

// Home > Permissions > Create New Permission
Breadcrumbs::register('permissions.create', function($breadcrumbs)
{
    $breadcrumbs->parent('permissions');
    $breadcrumbs->push('Create New Permission', route('permissions.create'));
});

// Home > Permissions > Show Permission
Breadcrumbs::register('permissions.show', function($breadcrumbs, $id)
{
    $permission = Permission::findOrFail($id);
    $breadcrumbs->parent('permissions');
    $breadcrumbs->push($permission->display_name, route('permissions.show', $permission->id));
});

// Home > Permissions > Edit Permission
Breadcrumbs::register('permissions.edit', function($breadcrumbs, $id)
{
    $permission = Permission::findOrFail($id);
    $breadcrumbs->parent('permissions');
    $breadcrumbs->push("Edit permission - " . $permission->display_name, route('permissions.edit', $permission->id));
});

/******** END PERMISSIONS ROUTES ********/


/******** ROLES ROUTES ********/

// Home > Roles
Breadcrumbs::register('roles', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('roles', route('roles.index'));
});

// Home > Roles > Create New Role
Breadcrumbs::register('roles.create', function($breadcrumbs)
{
    $breadcrumbs->parent('roles');
    $breadcrumbs->push('Create New Role', route('roles.create'));
});

// Home > Roles > Show Role
Breadcrumbs::register('roles.show', function($breadcrumbs, $id)
{
    $role = Role::findOrFail($id);
    $breadcrumbs->parent('roles');
    $breadcrumbs->push($role->display_name, route('roles.show', $role->id));
});

// Home > Roles > Edit Role
Breadcrumbs::register('roles.edit', function($breadcrumbs, $id)
{
    $role = Role::findOrFail($id);
    $breadcrumbs->parent('roles');
    $breadcrumbs->push("Edit role - " . $role->display_name, route('roles.edit', $role->id));
});

/******** END ROLES ROUTES ********/



/******** USERS ROUTES ********/

// Home > Users
Breadcrumbs::register('users', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Users', route('users.index'));
});

// Home > Users > Create New User
Breadcrumbs::register('users.create', function($breadcrumbs)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Create New User', route('users.create'));
});

// Home > Users > Create Bulk User Accounts
Breadcrumbs::register('bulk-users.create', function($breadcrumbs)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Create Bulk User Accounts', route('bulk-users.create'));
});

// Home > Users > Show User
Breadcrumbs::register('users.show', function($breadcrumbs, $id)
{
    $user = User::findOrFail($id);
    $full_names = $user->first_name . ' ' . $user->last_name;
    $breadcrumbs->parent('users');
    $breadcrumbs->push($full_names, route('users.show', $user->id));
});

// Home > Users > Edit User
Breadcrumbs::register('users.edit', function($breadcrumbs, $id)
{
    $user = User::findOrFail($id);
    $full_names = $user->first_name . ' ' . $user->last_name;
    $breadcrumbs->parent('users');
    $breadcrumbs->push("Edit user - " . $full_names, route('users.edit', $user->id));
});


/******** END USERS ROUTES ********/

