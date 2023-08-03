@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Family Tree</h1>
        <div id="family-tree"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const familyMembers = @json($familyMembers);

            // Create an array to hold the nodes of the tree
            const nodes = [];

            // Loop through familyMembers and create nodes
            familyMembers.forEach(member => {
                const node = {
                    id: member.id.toString(),
                    parent: member.parent_id ? member.parent_id.toString() : '#',
                    text: member.name,
                    icon: member.gender === 'M' ? 'fa fa-male' : 'fa fa-female'
                };
                nodes.push(node);
            });

            // Initialize jsTree
            $('#family-tree').jstree({
                core: {
                    data: nodes
                },
                plugins: ['dnd', 'search', 'types'],
                types: {
                    default: {
                        icon: 'fa fa-user'
                    }
                }
            });
        });
    </script>
@endsection
