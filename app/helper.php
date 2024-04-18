<?php

if (!function_exists('get_tenant_subdomain')) {
    function get_tenant_subdomain(): string {
        return explode('.', request()->getHost())[0];
    }
}
