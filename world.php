<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = $_GET['query'] ?? '';
$city = $_GET['lookup'] ?? '';

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


$stmt = $conn->query("SELECT * FROM cities 
  JOIN countries ON cities.country_code = countries.code
  WHERE countries.name LIKE '%$country%' 
  ORDER BY countries.name");

$cities = $stmt->fetchALL(PDO::FETCH_ASSOC);
?>

<?php if ($city === 'cities'): ?>
  <table>
    <tr>
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
    </tr>
  <?php foreach ($cities as $row): ?>
    <tr>
      <td><?= $row['name']?></td>
      <td><?= $row['district']?></td>
      <td><?= $row['population']?></td>
    </tr>
  <?php endforeach ?>
  </table>

<?php else: ?>
  
    <table>
    <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence Year</th>
      <th>Head of State</th>
    </tr>
    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name']?></td>
        <td><?= $row['continent']?></td>
        <td><?= $row['independence_year']?></td>
        <td><?= $row['head_of_state']?></td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif ?>