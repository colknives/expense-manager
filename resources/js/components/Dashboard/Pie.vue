<template>
    <chart :chartdata="data" options=""></chart>
</template>

<script>
    import Chart from "./Chart";

    export default {
        name: "pie",
        props: ["chartdata"],
        components: {
            'chart': Chart
        },
        created() {
            this.dataChart = JSON.parse(this.chartdata);
        },
        data: function(){
            return {
                dataChart: [],
                data: {
                    datasets: [{
                        data: [10]
                    }],

                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        'Red'
                    ]
                }
            }
        }
    }
</script>

