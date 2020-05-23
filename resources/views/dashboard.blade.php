@extends('layouts.app')

@section('content')

    <top-navigation></top-navigation>
    <left-navigation></left-navigation>

    <div class="container">
        test sdasdasdasdsdasdasdasd
    </div>
@endsection
<script>
    import LeftNavigation from "../js/components/Partials/LeftNavigation";
    import TopNavigation from "../js/components/TopNavigation";
    export default {
        components: {TopNavigation, LeftNavigation}
    }
</script>
        <script>
            import TopNavigation from "../js/components/TopNavigation";
            export default {
                components: {TopNavigation}
            }
        </script>
