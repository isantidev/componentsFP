const { Router } = require("express");
const router = Router();

router.get("/", (req, res) => {
    res.jason({ Title: "Hello World" });
});

module.exports = router;
