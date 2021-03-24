default:
	msgfmt ../locale/de_DE/LC_MESSAGES/homelibrary.po -o ../locale/de_DE/LC_MESSAGES/homelibrary.mo
	msgfmt ../locale/el_GR/LC_MESSAGES/homelibrary.po -o ../locale/el_GR/LC_MESSAGES/homelibrary.mo

merge:
	msgmerge --update ../locale/de_DE/LC_MESSAGES/homelibrary.po homelibrary.pot
	msgmerge --update ../locale/el_GR/LC_MESSAGES/homelibrary.po homelibrary.pot
	# msgmerge homelibrary.po homelibrary.po_new > homelibrary.po.tmp
	# mv homelibrary.po.tmp homelibrary.po
	# rm homelibrary.po_new

newstrings:
	xgettext -Lphp --from-code=UTF-8 --add-comments ../ics/*.php ../app/php/*.php ../dist/php/*.php ../pages/*.php -o  homelibrary.pot