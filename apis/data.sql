#for month
SELECT SUM(td.Quantity) Quantity,sum(td.rate*td.Quantity) Sale,COUNT(tm.transactionId) inv 
FROM transaction_details td INNER JOIN transaction_master tm ON tm.transactionId = td.transaction_id WHERE tm.isReturn = 0 AND
MONTH(tm.invDate) = MONTH(CURRENT_DATE())

for year

SELECT SUM(td.Quantity) Quantity,sum(td.rate*td.Quantity) Sale,COUNT(tm.transactionId) inv 
FROM transaction_details td INNER JOIN transaction_master tm ON tm.transactionId = td.transaction_id 
WHERE tm.isReturn = 0 AND YEAR(tm.invDate) = YEAR(CURRENT_DATE())