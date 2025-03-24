
# Changelog

## [1.2.4] – 2025-03-23
### Added
- New shortcodes for status-filtered property listings:
  - [vitec-intaget] → status ID 2
  - [vitec-till-salu] → status ID 3
  - [vitec-sald] → status ID 4
  - [vitec-referens] → status ID 10

### Changed
- `updateProperties()` now supports optional `$status_id` filter
- WordPress compatibility updated to 6.7.2
- Author updated to [ajnadox](https://github.com/ajnadox)

### Fixed
- Correct object detail rendering logic (replaced deprecated `getByType`)


## [0.1] – Initial
### Added
- Initial implementation of the plugin by sini6a
