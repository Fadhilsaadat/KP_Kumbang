<?php

use Myth\Auth\Entities\User;

if (! function_exists('logged_in')) {
    /**
     * Checks to see if the user is logged in.
     *
     * @return bool
     */
    function logged_in()
    // Memeriksa apakah pengguna sedang login atau tidak dengan memanggil fungsi check() dari service
    // authentication. Mengembalikan true jika pengguna sedang login, dan false jika tidak.
    {
        return service('authentication')->check();
    }
}

if (! function_exists('user')) {
    //Mengembalikan instance User (entitas pengguna) untuk pengguna yang sedang login 
    //saat ini dengan memanggil fungsi check() dari service authentication, 
    //kemudian memanggil fungsi user() untuk mendapatkan informasi pengguna. Mengembalikan instance User 
    //jika pengguna sedang login, dan null jika tidak.
    /**
     * Returns the User instance for the current logged in user.
     *
     * @return User|null
     */
    function user()
    {
        $authenticate = service('authentication');
        $authenticate->check();

        return $authenticate->user();
    }
}

if (! function_exists('user_id')) {
    //Mengembalikan ID pengguna (user ID) untuk pengguna yang sedang login 
    //saat ini dengan memanggil fungsi check() dari service authentication, 
    //kemudian memanggil fungsi id() untuk mendapatkan ID pengguna. Mengembalikan ID pengguna jika pengguna sedang login, 
    //dan null jika tidak.
    /**
     * Returns the User ID for the current logged in user.
     *
     * @return int|null
     */
    function user_id()
    {
        $authenticate = service('authentication');
        $authenticate->check();

        return $authenticate->id();
    }
}

if (! function_exists('in_groups')) {
    /**
     *  Memastikan bahwa pengguna yang sedang login termasuk dalam setidaknya salah satu dari grup yang diberikan. 
     * Grup dapat diberikan dalam bentuk ID atau nama grup. Fungsi ini memerlukan service authentication dan authorization. 
     * Jika pengguna sedang login, maka fungsi inGroup() dari service authorization akan dipanggil 
     * dengan parameter grup dan ID pengguna saat ini. Mengembalikan true jika pengguna termasuk dalam salah satu grup yang diberikan,
     *  dan false jika tidak atau jika pengguna tidak sedang login.
     * 
     * Ensures that the current user is in at least one of the passed in
     * groups. The groups can be passed in as either ID's or group names.
     * You can pass either a single item or an array of items.
     *
     * Example:
     *  in_groups([1, 2, 3]);
     *  in_groups(14);
     *  in_groups('admins');
     *  in_groups( ['admins', 'moderators'] );
     *
     * @param mixed $groups
     */
    function in_groups($groups): bool
    {
        $authenticate = service('authentication');
        $authorize    = service('authorization');

        if ($authenticate->check()) {
            return $authorize->inGroup($groups, $authenticate->id());
        }

        return false;
    }
}

if (! function_exists('has_permission')) {
    /**
     * Ensures that the current user has the passed in permission.
     * The permission can be passed in either as an ID or name.
     * 
     * Memastikan bahwa pengguna yang sedang login memiliki izin yang diberikan. Izin dapat diberikan dalam bentuk ID atau nama izin. 
     * Fungsi ini juga memerlukan service authentication dan authorization. Jika pengguna sedang login, maka fungsi hasPermission() 
     * dari service authorization akan dipanggil dengan parameter izin dan ID pengguna saat ini.
     *  Mengembalikan true jika pengguna memiliki izin yang diberikan, dan false jika tidak atau jika pengguna tidak sedang login.
     *
     * @param int|string $permission
     */
    function has_permission($permission): bool
    {
        $authenticate = service('authentication');
        $authorize    = service('authorization');

        if ($authenticate->check()) {
            return $authorize->hasPermission($permission, $authenticate->id()) ?? false;
        }

        return false;
    }
}
