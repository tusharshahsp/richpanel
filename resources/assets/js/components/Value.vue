<template> 
    <div class="container">
    <p><strong>Total Cart Value :</strong> Rs value{value}</p>
    <div>
</template>
 
<script>
    export default {
        data: function() {
            return {
                value: ''
            }
        },
        methods: {
            AddtoCart()
            {
                axios.post('/addtocart', {
                    id: this.product.id,
                    quantity: this.product.quantity,
                    size: this.product.size,
                    
                })
                    .then(response => {
 
                        this.reset();
 
                        $("#add_task_cart").modal("hide");
 
                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.id) {
                            this.errors.push(error.response.data.errors.id[0]);
                        }
 
                        if (error.response.data.errors.quantity) {
                            this.errors.push(error.response.data.errors.quantity[0]);
                        }

                        if (error.response.data.errors.size) {
                            this.errors.push(error.response.data.errors.size[0]);
                        }
                    });
            },
            reset()
            {
                this.product.id = this.productId;
                this.product.quantity = '';
                this.product.size = '';
            },
        }
    }
</script>