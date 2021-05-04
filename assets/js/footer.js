document.addEventListener("DOMContentLoaded", () => {
    const inputField = document.getElementById("chatBotInput")
    inputField.addEventListener("keydown", function(e) {
        if (e.code === "Enter") {
            let input = inputField.value;
            console.log(`I typed '${input}'`)
        }
    });
});