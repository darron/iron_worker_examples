## Steps to test your connection

1. Fill in your database url with credentials

```js
mongoose.connect('mongodb://localhost/test');
```

2. Create iron.json (explained [here](http://dev.iron.io/worker/reference/configuration/))
3. `iron_worker upload mean`
4. `iron_worker queue mean`

5. Check the log of your worker task task to see the results
6. please note that the schema, model, and query are just meant as examples and will result in error if not commented out


