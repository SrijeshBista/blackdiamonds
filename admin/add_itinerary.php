<?php
include '../config/constants.php';

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$package_id = isset($_POST['package']) ? mysqli_real_escape_string($conn, $_POST['package']) : '';
$days = isset($_POST['days']) ? mysqli_real_escape_string($conn, $_POST['days']) : '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // Check for empty fields
  if (!empty($package_id) && !empty($days)) {
    // Delete existing itineraries for the selected package
    $delete_query = "DELETE FROM itineraries WHERE package_id = '$package_id'";
    mysqli_query($conn, $delete_query);

    // Insert or update itinerary questions and answers
    for ($i = 1; $i <= $days; $i++) {
      $question = mysqli_real_escape_string($conn, $_POST['question_' . $i]);
      $answer = mysqli_real_escape_string($conn, $_POST['answer_' . $i]);

      if (!empty($question) && !empty($answer)) {
        $query = "INSERT INTO itineraries (package_id, day, question, answer) VALUES ('$package_id', '$i', '$question', '$answer')
                  ON DUPLICATE KEY UPDATE question='$question', answer='$answer'";
        if (!mysqli_query($conn, $query)) {
          echo "<script> alert('Error inserting data: " . mysqli_error($conn) . "'); </script>";
        }
      }
    }
    header("Location: add_itinerary.php"); // Correct path to redirect
    exit();
  } else {
    echo "<script> alert('Enter valid information!'); </script>";
  }
}

// Fetch existing itinerary data
$existing_itinerary = [];
if (isset($_GET['package'])) {
  $package_id = mysqli_real_escape_string($conn, $_GET['package']);
  $query = "SELECT * FROM itineraries WHERE package_id = '$package_id' ORDER BY day";
  $result = mysqli_query($conn, $query);
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $existing_itinerary[$row['day']] = [
        'question' => $row['question'],
        'answer' => $row['answer']
      ];
    }
  }
}
?>

<?php include 'includes/header.php'; ?>
<section class="backend-page">
  <?php include 'includes/nav.php'; ?>
  <div class="page">
    <h2 class="section-heading">Add/Update Itinerary</h2>
    <div class="add-admin-form">
      <form action="" method="POST" id="itinerary-form">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="package">Select Package</label> <br>
            <select name="package" class="custom-select form-control" id="package" required>
              <option value="" disabled selected>Select Package</option>
              <?php
              $sql2 = "SELECT * FROM packages";
              $res2 = mysqli_query($conn, $sql2);
              while ($row = mysqli_fetch_assoc($res2)) {
                $id = $row['id'];
                $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
                echo "<option value='$id'" . ($id == $package_id ? ' selected' : '') . ">$title</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label for="days">Number of Days</label>
            <input type="number" class="form-control" id="days" name="days" min="1" required value="<?php echo isset($_POST['days']) ? htmlspecialchars($_POST['days']) : (count($existing_itinerary) > 0 ? count($existing_itinerary) : ''); ?>">
          </div>

          <div id="itinerary-questions">
            <?php for ($i = 1; $i <= count($existing_itinerary); $i++) : ?>
              <div class="form-group col-md-12">
                <h4>Day <?php echo $i; ?></h4>
                <div class="form-group">
                  <label for="question_<?php echo $i; ?>">Enter Question for Day <?php echo $i; ?></label>
                  <textarea class="form-control" id="question_<?php echo $i; ?>" name="question_<?php echo $i; ?>" rows="3" required><?php echo isset($existing_itinerary[$i]['question']) ? htmlspecialchars($existing_itinerary[$i]['question']) : ''; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="answer_<?php echo $i; ?>">Enter Answer for Day <?php echo $i; ?></label>
                  <textarea class="form-control" id="answer_<?php echo $i; ?>" name="answer_<?php echo $i; ?>" rows="3" required><?php echo isset($existing_itinerary[$i]['answer']) ? htmlspecialchars($existing_itinerary[$i]['answer']) : ''; ?></textarea>
                </div>
              </div>
            <?php endfor; ?>
          </div>

          <div class="form-group">
            <button type="submit" class="btn-done">Add/Update Itinerary</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
  document.getElementById('days').addEventListener('change', function() {
    var days = this.value;
    var container = document.getElementById('itinerary-questions');
    container.innerHTML = ''; // Clear existing fields

    for (var i = 1; i <= days; i++) {
      var dayDiv = document.createElement('div');
      dayDiv.classList.add('form-group', 'col-md-12');
      dayDiv.innerHTML = `
        <h4>Day ${i}</h4>
        <div class="form-group">
          <label for="question_${i}">Enter Question for Day ${i}</label>
          <textarea class="form-control" id="question_${i}" name="question_${i}" rows="3" required></textarea>
        </div>
        <div class="form-group">
          <label for="answer_${i}">Enter Answer for Day ${i}</label>
          <textarea class="form-control" id="answer_${i}" name="answer_${i}" rows="3" required></textarea>
        </div>
      `;
      container.appendChild(dayDiv);
    }

    // Populate existing data if available
    <?php if (isset($existing_itinerary)) : ?>
      <?php foreach ($existing_itinerary as $day => $data) : ?>
        document.getElementById('question_<?php echo $day; ?>').value = '<?php echo addslashes($data['question']); ?>';
        document.getElementById('answer_<?php echo $day; ?>').value = '<?php echo addslashes($data['answer']); ?>';
      <?php endforeach; ?>
    <?php endif; ?>
  });

  // Trigger the change event to populate fields on page load
  document.getElementById('days').dispatchEvent(new Event('change'));
</script>

<?php include 'includes/footer.php'; ?>