let currentFilter = 'all_tasks';

function filterTask(element) {
    currentFilter = element.value;
    applyCurrentFilter();
    verifyIfHasTasksToShow();
}

function applyCurrentFilter() {
    switch (currentFilter) {
        case 'all_tasks':
            showAllTasks();
            break;
        case 'pending_tasks':
            showAllTasks();
            document.querySelectorAll('.done_task').forEach((e) => {
                e.style.display = 'none';
            });
            break;
        case 'performed_tasks':
            showAllTasks();
            document.querySelectorAll('.pending_task').forEach((e) => {
                e.style.display = 'none';
            });
            break;
    }
}

async function checkTask(element) {
    let isDone = element.checked ? 1 : 0;
    let taskId = element.dataset.id;

    let req = await fetch(`${window.config.base_url}ajax/task/update`, {
        method: 'POST',
        headers: {
            'Content-type': 'application/json',
            accept: 'application/json',
        },
        body: JSON.stringify({ isDone, taskId, _token: window.config.csrf_token }),
    });

    let res = await req.json();

    if (res.success) {
        const taskElement = element.closest('.task');

        if (isDone) {
            taskElement.classList.remove('pending_task');
            taskElement.classList.add('done_task');
        } else {
            taskElement.classList.remove('done_task');
            taskElement.classList.add('pending_task');
        }

        applyCurrentFilter();
        countPendingTasks();
        countDoneTasks();
        updateProgress();
    } else {
        element.checked = !element.checked;
    }
}

function showAllTasks() {
    document.querySelectorAll('.task').forEach((e) => {
        e.style.display = 'flex';
    });
    countPendingTasks();
    countDoneTasks();
}

function verifyIfHasTasksToShow() {
    let allTaskElements = document.querySelectorAll('.task');
    let hiddenTasks = Array.from(allTaskElements).filter((task) => {
        return window.getComputedStyle(task).display === 'none';
    });

    let whitoutTasksElement = document.querySelector('.without_tasks');

    whitoutTasksElement.classList.add('hidden');
    if (allTaskElements.length === hiddenTasks.length) {
        whitoutTasksElement.classList.remove('hidden');
        whitoutTasksElement.classList.add('flex');
    }
}

function countPendingTasks() {
    let pendingTasks = document.querySelectorAll('.pending_task');
    let pendingTaskText = document.querySelector('.pending_tasks_count');
    let totalTasks = document.querySelectorAll('.task');

    pendingTaskText.innerHTML = '';
    if (pendingTasks.length > 0) {
        pendingTaskText.innerHTML = `
                <i class="fa-solid fa-circle-exclamation mr-2 group-hover:animate-bounce"></i>
                Resta${pendingTasks.length > 1 ? 'm' : ''} ${pendingTasks.length} tarefa${
            pendingTasks.length > 1 ? 's' : ''
        }
                para ser realizada.
            `;
    } else if (totalTasks.length === 0) {
        pendingTaskText.innerHTML = 'Crie a primeira tarefa do dia!';
    } else {
        pendingTaskText.innerHTML = 'Nenhuma tarefa pendente! 🎉';
    }
}

function countDoneTasks() {
    let doneTasksCount = document.querySelectorAll('.done_task').length;
    let doneTasksText = document.getElementById('done_tasks_count');

    doneTasksText.innerHTML = '';
    doneTasksText.innerHTML = doneTasksCount.toString();
}

document.addEventListener('DOMContentLoaded', () => {
    currentFilter = 'all_tasks';
    applyCurrentFilter();
    verifyIfHasTasksToShow();
    countPendingTasks();
    countDoneTasks();
});
