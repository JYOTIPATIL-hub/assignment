<?php
// Handle form submission and generate Gantt chart

// Process form data and generate Gantt chart dynamically
// You need to implement this part based on your requirements

// Example dummy data
$tasks = [
    ['name' => 'Task 1', 'start_date' => '2024-03-15', 'end_date' => '2024-03-20', 'dependency' => ''],
    ['name' => 'Task 2', 'start_date' => '2024-03-18', 'end_date' => '2024-03-25', 'dependency' => 'Task 1'],
];

// Example SVG generation (simplified)
echo '<svg width="800" height="200">';

foreach ($tasks as $task) {
    // Generate task bars
    echo '<rect class="task" x="0" y="' . ($task['index'] * 30) . '" width="'
        . (strtotime($task['end_date']) - strtotime($task['start_date'])) * 10 . '" height="20"></rect>';
    // Generate task labels
    echo '<text class="task-label" x="5" y="' . ($task['index'] * 30 + 15) . '">' . $task['name'] . '</text>';
}

// Example dependency lines (simplified)
foreach ($tasks as $task) {
    if (!empty($task['dependency'])) {
        $dependencyIndex = array_search($task['dependency'], array_column($tasks, 'name'));
        if ($dependencyIndex !== false) {
            echo '<line class="dependency" x1="'
                . (strtotime($tasks[$dependencyIndex]['end_date']) - strtotime($task['start_date'])) * 10
                . '" y1="' . ($dependencyIndex * 30 + 10) . '" x2="0" y2="' . ($task['index'] * 30 + 10) . '"></line>';
        }
    }
}

echo '</svg>';
?>