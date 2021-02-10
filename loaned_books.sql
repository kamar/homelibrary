SELECT bl.isbn, b.title, count(bl.loan_id) as metrisi
FROM
    tbl_bookloan bl, tbl_books b
WHERE
    bl.isbn = b.isbn
GROUP BY
    bl.isbn, b.title
ORDER BY
    metrisi DESC;
