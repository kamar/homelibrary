default:
	msgfmt homelibrary.po -o homelibrary.mo

merge:
	msgmerge homelibrary.po homelibrary.po_new > homelibrary.po.tmp
	mv homelibrary.po.tmp homelibrary.po
	rm homelibrary.po_new