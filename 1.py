import pandas as pd

# Generate customer.csv
customers = {
    'CustomerID': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    'Name': ['Roieee', 'Bob', 'Charlie', 'David', 'Eve', 'Frank', 'Grace', 'Heidi', 'Ivan', 'You'],
    'Email': ['yerouuoey@qq.com', 'bob@example.com', 'charlie@example.com', 'david@example.com', 'eve@example.com',
              'frank@example.com', 'grace@example.com', 'heidi@example.com', 'ivan@example.com', 'you@example.com']
}
customers_df = pd.DataFrame(customers)
customers_df.to_csv('customer.csv', index=False)

# Generate orders.csv
orders = {
    'OrderID': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    'CustomerID': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    'Product': ['ProductA', 'ProductB', 'ProductC', 'ProductD', 'ProductE', 'ProductF', 'ProductG', 'ProductH', 'ProductI', 'ProductJ'],
    'Quantity': [10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
    'Price': [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000],
    'OrderDate': ['2024-09-01', '2024-10-01', '2024-11-01', '2025-01-01', '2025-02-01', '2025-03-01', '2025-04-01', '2025-05-01', '2025-06-01', '2025-07-01']
}
orders_df = pd.DataFrame(orders)
orders_df.to_csv('orders.csv', index=False)

# Print your name
print("Your name is Roieee")