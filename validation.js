const validation = new justvalidate("#signup");
validation
.addfield("#username",[
    {
        rule: "required"
    }
])
.addfield("#email", [
    {
        rule: "required"
    },
    {
        rule:"email"
    }
])
.addfield("#password1", [
    {
        rule: "required"
    },
    {
        rule:"password1"
    }
])
.addfield("#password2", [
    {
        validator: (value, fields)=>{
            return value === fields["#password"].elem.value;

        },
        errorMessage: "passwords should match"
    }
])
    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });