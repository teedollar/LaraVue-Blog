<template>
        <div>
            This is the home page .
        </div>
</template>

    <script>
        export default {
            data(){
                return {
                    products : []
                }
            },
            mounted(){
                    
            }
        }
    </script>

    <style scoped>
    .small-text {
        font-size: 14px;
    }
    .product-box {
        border: 1px solid #cccccc;
        padding: 10px 15px;
    }
    .hero-section {
        height: 30vh;
        background: #ababab;
        align-items: center;
        margin-bottom: 20px;
        margin-top: -20px;
    }
    .title {
        font-size: 60px;
        color: #ffffff;
    }
    </style>