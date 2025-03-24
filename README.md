
# Ctrl Vitec Integration — Extended Version

This is a **modified and extended version** of the [original Ctrl Vitec Integration plugin](https://github.com/sini6a/ctrl-vitec-integration) for WordPress, which integrates with the [Vitec API](https://connect.maklare.vitec.net/Help/Api/POST-Estate-GetEstateList) to display real estate listings.

This version adds multiple new shortcodes to support filtering by specific estate statuses such as "Intaget", "Till salu", "Såld", and "Referensobjekt".

---

## 🔧 Features Added

This version introduces **four new shortcodes**, each corresponding to a different status ID in the Vitec estate system:

| Shortcode           | Vitec Status ID | Description              |
|---------------------|------------------|--------------------------|
| `[vitec-intaget]`   | `2`              | Shows estates marked as "Intaget" (Intake) |
| `[vitec-till-salu]` | `3`              | Shows estates that are currently "Till salu" (For Sale) |
| `[vitec-sald]`      | `4`              | Displays properties that are "Såld" (Sold) |
| `[vitec-referens]`  | `10`             | Displays "Såld/Referensobjekt" (Sold/Reference) |

Each shortcode loads the same design as the original `[vitec-integration-shortcode]`, but filtered by a single status ID.

---

## 🖥️ Usage

Add any of the following shortcodes to a WordPress post or page:

```wordpress
[vitec-intaget]
[vitec-till-salu]
[vitec-sald]
[vitec-referens]
```

Each shortcode will:
- Display a list of properties filtered by status
- Allow clicking into a detailed view using query parameters (`object_id`, `object_type`)

---

## 📦 Installation

1. Download the latest zip release from this repo (or from the build system).
2. In WordPress admin, go to **Plugins → Add New**.
3. Click **Upload Plugin**, and choose the `.zip` file.
4. Activate the plugin.
5. Use one of the new shortcodes on a page or post.

---

## 🗂️ File Modifications Summary

- `Property.php`: `updateProperties()` now accepts an optional `$status_id`
- `class-ctrl-vitec-integration-public.php`: Added 4 new shortcode handlers

---

## 📄 License

Inherited from the original MIT license by [sini6a](https://github.com/sini6a).

---

## 🧠 Credits

- Original plugin: [sini6a/ctrl-vitec-integration](https://github.com/sini6a/ctrl-vitec-integration)
- Extended by: [ajnadox](https://github.com/ajnadox)


---

## 📚 API Reference

This plugin communicates with the Vitec API using the following endpoint:

🔗 [POST /Estate/GetEstateList – Vitec API Docs](https://connect.maklare.vitec.net/Help/Api/POST-Estate-GetEstateList)

This endpoint allows filtering by `status ID`, and supports returning all major property types.
