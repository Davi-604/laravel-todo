function setProgress(progress) {
    const circle = document.getElementById('progress-circle');
    const valueDisplay = document.getElementById('progress-value');

    const radius = 45;
    const circumference = 2 * Math.PI * radius;

    const offset = circumference - (progress / 100) * circumference;

    circle.style.strokeDashoffset = offset;
    valueDisplay.textContent = `${!isNaN(progress) ? progress : '0'}%`;
}

function updateProgress() {
    let totalTasks = document.querySelectorAll('.task').length ?? 0;
    let completedTasks = document.querySelectorAll('.done_task').length ?? 0;

    let progress = Math.round((completedTasks / totalTasks) * 100);

    setProgress(progress);
}

document.addEventListener('DOMContentLoaded', () => {
    updateProgress();
});
