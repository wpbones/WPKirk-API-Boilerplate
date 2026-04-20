# WPKirk-API-Boilerplate

Focused demo of the **REST API routing** layer in WP Bones: route files auto-discovered from
`api/<vendor>/<version>/`, classic controller pattern, response helpers, permission callbacks,
request args.

## What this demos

Routes at `/wp-json/wpkirk/v1/*` registered via `WPKirk\WPBones\Routing\API\Route`:

- `GET /example` — inline closure, plain string response
- `GET /example_json` — inline closure, `wp_send_json` response
- `GET /example_response` — inline closure, framework response helper
- `GET /version`, `POST /version` — same URL, multi-method
- `GET /multiple` — `Route::request(['get','POST'], …)`
- `GET /controller_args` — controller method with query params
- `GET /protected` — closure with failing `permission_callback`
- `GET /error`, `GET /invalid`, `GET /error/controller` — error-shape responses

**Key files to read first:**

| File | What to look at |
| --- | --- |
| `api/wpkirk/v1/route.php` | All route definitions (closures + controller bindings) |
| `plugin/API/WPKirkV1Controller.php` | Controller subclassing `RestController` |
| `config/api.php` | Route file discovery config |

## Smoke test (manual, ~30s)

With the plugin active on `wpbones.test`:

```sh
# replace your-site.test with your local domain
curl -s http://your-site.test/wp-json/wpkirk/v1/example
# → "Hello World!"

curl -s http://your-site.test/wp-json/wpkirk/v1/example_json | jq .
# → { "tag": "v1.0.0" }

curl -s -o /dev/null -w "%{http_code}\n" http://your-site.test/wp-json/wpkirk/v1/protected
# → 401 (permission_callback returns false)
```

If any of the above fail: check `wp-content/debug.log` for PHP errors, confirm permalinks are
**not** set to "Plain" in Settings → Permalinks (REST routes need rewrite rules), and verify the
plugin is active via `wp plugin list`.

## Use as a template

```sh
# 1. clone from the GitHub template
gh repo create my-api-plugin --template wpbones/WPKirk-API-Boilerplate --public --clone
cd my-api-plugin

# 2. rename the PHP namespace + plugin slug
composer install
php bones rename "My API Plugin"

# 3. build + activate
yarn install && yarn build
wp plugin activate my-api-plugin
```

Edit `api/<vendor>/<version>/route.php` for your endpoints, add controllers under
`plugin/API/`. The `api.php` config picks new files up automatically — no manual registration.

## Framework surface exercised

This boilerplate doubles as a **regression bed** for the REST API layer of WP Bones. If you're
contributing upstream, it's a good target for changes to `WPBones/src/Routing/API/*`:

- `WPKirk\WPBones\Routing\API\Route::get/post/request/response/responseError`
- `WPKirk\WPBones\Routing\API\RestController` base class + `$request`, `$vendor`
- Route file auto-discovery from `api/<vendor>/<version>/` via `config/api.php`
- `logger()` helper used inside controllers
