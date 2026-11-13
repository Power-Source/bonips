#!/bin/sh
set -eu

root=$(CDPATH= cd -- "$(dirname -- "$0")/.." && pwd)

if ! command -v wp >/dev/null 2>&1; then
	echo "WP-CLI is required to update translations." >&2
	exit 1
fi

wp i18n make-pot "$root" "$root/lang/bonips.pot" \
	--domain=bonips \
	--exclude=addons/buy-creds/gateways/Bitpay,addons/import/includes/File-CSV-DataSource.php,assets/libs,addons/stats/assets/libs,addons/stats/assets/js/Chart.js

wp i18n update-po "$root/lang/bonips.pot" "$root/lang/bonips-en_US.po"
wp i18n make-mo "$root/lang/bonips-en_US.po" "$root/lang/bonips-en_US.mo"
