<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // Members
            'members.view', 'members.create', 'members.edit',
            'members.delete', 'members.export',

            // Attendance
            'attendance.view', 'attendance.mark', 'attendance.edit',
            'attendance.export',

            // Finance
            'finance.view', 'finance.create', 'finance.edit',
            'finance.delete', 'finance.export',

            // Groups
            'groups.view', 'groups.create', 'groups.edit',
            'groups.delete', 'groups.manage_members',

            // Events
            'events.view', 'events.create', 'events.edit', 'events.delete',

            // Communication
            'communication.send_sms', 'communication.send_email',
            'communication.view_logs',

            // Reports
            'reports.view', 'reports.export',

            // Settings
            'settings.church_profile', 'settings.manage_users',
            'settings.manage_roles', 'settings.billing',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // super_admin — full access
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // church_admin — everything except billing
        $churchAdmin = Role::firstOrCreate(['name' => 'church_admin']);
        $churchAdmin->givePermissionTo(
            Permission::whereNotIn('name', ['settings.billing'])->get()
        );

        // pastor — read access + announcements
        $pastor = Role::firstOrCreate(['name' => 'pastor']);
        $pastor->givePermissionTo([
            'members.view', 'attendance.view', 'groups.view',
            'events.view', 'events.create', 'reports.view',
            'communication.send_email',
        ]);

        // finance_officer — finance only
        $financeOfficer = Role::firstOrCreate(['name' => 'finance_officer']);
        $financeOfficer->givePermissionTo([
            'finance.view', 'finance.create',
            'finance.edit', 'finance.delete', 'finance.export',
            'reports.view', 'reports.export',
        ]);

        // secretary — members, events, attendance
        $secretary = Role::firstOrCreate(['name' => 'secretary']);
        $secretary->givePermissionTo([
            'members.view', 'members.create', 'members.edit', 'members.export',
            'attendance.view', 'attendance.mark', 'attendance.edit',
            'events.view', 'events.create', 'events.edit',
            'groups.view',
        ]);

        // member — own profile only
        $member = Role::firstOrCreate(['name' => 'member']);
        $member->givePermissionTo([
            'members.view',
        ]);
    }
}
