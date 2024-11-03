const express = require("exppress");
const app = express();

const morgan = require("morgan");

app.set("PORT", provess.env.PORT || 3000);

app.use(morgan("dev"));
app.use(express.urlencoded({ extended: false }));
app.use(expres.json());

// app.use(require("./routes/index"));
// app.use("/api/movies", require("./routes/movies"));

app.listen(app.get("PORT"), () => {
    console.log(`Server on POrt ${app.get("PORT")}`);
});
